#encoding: utf-8

Then(/^there (?:are|is) (\d+) nearby station[s]?$/) do |number|
  find('#nav-place-stations').all('li', :count => number)
end

Then(/^I see the following nearby stations:$/) do |table|
  found_connections = find('#nav-place-stations').all('li')
  actual_connections = found_connections.map { |connection| [connection.text[/(\w+)/, 1], connection.text[/\w+ (.+)/, 1]] }
  
  table.diff! actual_connections
end