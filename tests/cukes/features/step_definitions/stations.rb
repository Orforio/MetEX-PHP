#encoding: utf-8
Then(/^I see a (\d+)\-photo slideshow$/) do |photos|
  page.assert_selector('.content-station-photos-slide', :count => photos, :visible => false)
end

Then(/^the following photos are on the page:$/) do |table|
  expected_photos = table.raw.flatten
  
  found_photos = page.all('#content-station-photos img', :visible => :all)
  actual_photos = found_photos.map { |img| img[:src] }
  
  expected_photos.should == actual_photos
end

Then(/^the following photos are visible:$/) do |table|
  expected_photos = table.raw.flatten
  
  Capybara.default_wait_time = 5
  expected_photos.each { |expected_photo| page.find(:xpath, "//img[@src='#{expected_photo}']", :visible => true) }
end

Then(/^the following photos are not visible:$/) do |table|
  not_expected_photos = table.raw.flatten
  
  Capybara.default_wait_time = 5
  not_expected_photos.each { |not_expected_photo| page.should have_no_selector(:xpath, "//img[@src='#{not_expected_photo}']", :visible => true) }
end

Then(/^when I press the "(.*?)"\-arrow$/) do |direction|
  find("a.carousel-control.#{direction}").click
end

Then(/^when I hover over the slideshow$/) do
  page.find('#carousel-station').hover
end

Then(/^there (?:are|is) (\d+) connection[s]?$/) do |number|
  find('#nav-station-connections').all('li', :count => number)
end

Then(/^I see the following connections:$/) do |table|
  found_connections = find('#nav-station-connections').all('li')
  actual_connections = found_connections.map { |connection| [connection.text[/(\w+)/, 1], connection.text[/\w+ (.+)/, 1]] }
  
  table.diff! actual_connections
end

Then(/^there (?:are|is) (\d+) nearby place[s]?$/) do |number|
  expect('#nav-station-places').to have_selector('li', count: number)
end

Then(/^I see the following nearby places:$/) do |table|
  found_connections = find('#nav-station-places').all('li')
  actual_connections = found_connections.map { |connection| [connection.text] }
  
  table.diff! actual_connections
end