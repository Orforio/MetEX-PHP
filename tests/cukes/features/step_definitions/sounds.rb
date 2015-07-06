#encoding: utf-8

Then(/^there is (\d+) audio$/) do |number|
  page.assert_selector('#content-station-description audio', :count => number)
end