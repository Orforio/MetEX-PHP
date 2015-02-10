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