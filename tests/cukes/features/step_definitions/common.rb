#encoding: utf-8
Given(/^the fixtures are in place$/) do
  DB.transaction do
    File.open(File.expand_path('../../app/Test/Fixture/SQL/phpunit-cucumber.sql'), 'r', :encoding => 'UTF-8').each do |line|
      DB << line
    end
  end
end

Given(/^I am logged in as "(.*?)"$/) do |arg1|
  case arg1
  when "Admin"
    # PENDING
  when "User"
    pending
  end
end

When(/^I visit "(.*?)"$/) do |url|
  visit(url)
  page.title.should_not include 'Errors'
end

When(/^I try to visit "(.*?)"$/) do |url|
  visit(url)
end

When(/^I press the "(.*?)" button$/) do |button|
  click_button(button)
end

When(/^I press the "(.*?)" link$/) do |link|
  click_link(link)
end

Then(/^I see "(.*?)"$/) do |text|
  page.should have_text(text)
end

Then(/^I see the following table:$/) do |table|
  hashes = table.hashes
  hashes.each do |hash|
    hash.each do |item|
      item.each do |text|  # TODO: This is bad and I should feel bad. Make it actually compare tables once Views are standardised.
        page.should have_text(text)
      end
    end
  end
end