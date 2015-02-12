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