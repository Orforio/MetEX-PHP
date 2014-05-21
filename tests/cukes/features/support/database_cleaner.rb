begin
  require 'database_cleaner'
  require 'database_cleaner/cucumber'
  require 'sequel'
  require 'mysql2'
  
  # Retrieve Cucumber-specific database details from CakePHP's config
  config_file = File.open(File.expand_path('../../app/Config/database.php'), 'r', :encoding => 'UTF-8').read[/public \$cucumber = array\((.+)\);/m, 1]
  db_config = eval("{" + config_file + "}")
  
  DB = Sequel.connect("mysql2://#{db_config['login']}:#{db_config['password']}@#{db_config['host']}:#{db_config['port']}/#{db_config['database']}")
  DatabaseCleaner[:sequel, { :connection => DB }].strategy = :truncation
rescue NameError
  raise "You need to add database_cleaner to your Gemfile (in the :test group) if you wish to use it."
end

Before do
  DatabaseCleaner.start
  DatabaseCleaner.clean
end

After do |scenario|
  DatabaseCleaner.clean
end

at_exit do
  unless ENV['WIPE_DB']  # Re-populate database with fixtures once tests are finished - good for playing around with sample data on DEV
    DB.transaction do
      File.open(File.expand_path('../../app/Test/Fixture/SQL/phpunit-cucumber.sql'), 'r', :encoding => 'UTF-8').each do |line|
        DB << line
      end
    end
  end
end