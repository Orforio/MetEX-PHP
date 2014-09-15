require 'rspec/expectations'
require 'capybara/cucumber'
require 'capybara/poltergeist'

if ENV['IN_BROWSER']
  # On demand: non-headless tests via Selenium/WebDriver
  # To run the scenarios in browser (default: Firefox), use the following command line:
  # IN_BROWSER=true bundle exec cucumber
  # or (to have a pause of 1 second between each step):
  # IN_BROWSER=true PAUSE=1 bundle exec cucumber
  Capybara.default_driver = :selenium
  Capybara.register_driver :selenium do |app|
    Capybara::Selenium::Driver.new(app, :browser => :firefox)
  end
  AfterStep do
    sleep (ENV['PAUSE'] || 0).to_i
  end
else
  # DEFAULT: headless tests with poltergeist/PhantomJS
  Capybara.register_driver :poltergeist do |app|
    Capybara::Poltergeist::Driver.new(
      app,
      window_size: [1280, 1024],
      timeout: 60
      #debug:       true
    )
  end
  Capybara.default_driver    = :poltergeist
  Capybara.javascript_driver = :poltergeist
end

Capybara.default_selector = :css

if ENV['TEST']
  Capybara.app_host = 'http://test.metex.sblorgh.org'
else
  Capybara.app_host = 'http://dev.metex.sblorgh.org'
end

World(RSpec::Matchers)