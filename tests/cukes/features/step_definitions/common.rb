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
  page.title.should_not include "Errors"
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

Then(/^I see the "(.*?)" element "(.*?)"$/) do |element, text|
  find(element).should have_text(text)
end

Then(/^I see the "(.*?)" table:$/) do |table_name, table_expected|
  rows = find("##{table_name}").all("tr")
  table_actual = rows.map { |r| r.all("th,td").map { |c| c.text } }
  table_expected.diff! table_actual
end

Then(/^the URL should be "(.*?)"$/) do |url|
  current_path.should == url
end

Then(/^I cannot click on "(.*?)"$/) do |text|
  expect {click_link(text)}.to raise_error(Capybara::ElementNotFound)
end