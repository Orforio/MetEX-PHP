#encoding: utf-8
Given(/^an administrator named Admin$/) do
  # PENDING express the regexp above with the code you wish you had
end

Given(/^a set of Movement data called "(.*?)"$/) do |movement_data|
  case movement_data
  when 'the sample'
    @movement_data = {
      :up => 'Bibliothèque François Mitterrand',
      :down => 'Pelleport',
      :up_allowed => true,
      :down_allowed => true,
      :length => '122',
    }
  when 'the changed sample'
    @movement_changed_data = {
	  :up => 'Cour Saint-Émilion',
      :down => 'Pré Saint-Gervais',
      :up_allowed => true,
      :down_allowed => false,
      :length => '765',
    }
  end
end

When(/^I fill the Movements form with "(.*?)"$/) do |movement_data|
  case movement_data
  when 'the sample'
    data = @movement_data
  when 'the changed sample'
    data = @movement_changed_data
  end
  
  select(data[:up], :from => 'MovementUpStationId')
  select(data[:down], :from => 'MovementDownStationId')
  check('MovementUpAllowed') if data[:up_allowed]
  check('MovementDownAllowed') if data[:down_allowed]
  fill_in('MovementLength', :with => data[:length])
  select(data[:up], :from => 'StationStation')
  select(data[:down], :from => 'StationStation')
end

Then(/^I remember "(.*?)"'s ID$/) do |movement_data|
  flash_message = page.find('#flashMessage').text
  id = flash_message[/MovementID: (\d+)/, 1]
  id.should_not be 0
  
  case movement_data
  when 'the sample'
  	@movement_data[:id] = id
  when 'the changed sample'
    @movement_changed_data[:id] = id
  end
end

Then(/^I see an error message$/) do
  page.title.should have_text("Errors")
end