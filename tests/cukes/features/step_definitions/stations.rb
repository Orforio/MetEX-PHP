#encoding: utf-8
Then(/^I see a (\d+)\-photo carousel$/) do |photos|
  page.assert_selector("div.item", :count => photos, :visible => false)
end