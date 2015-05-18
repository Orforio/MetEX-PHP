#encoding: utf-8
@active
Feature: Places - View
  As a passenger,
  I want to see places of interest near the current station
  So that I can see more photos and information
  
  Background:
    Given the fixtures are in place
    
  Scenario: Viewing page
    When I visit "/places/view/1"
    Then I see the "h1" element "Saint-Lazare station"
    And I see "The floor of this mezzanine features a clock"
    
  Scenario: Viewing slideshow
    When I visit "/places/view/1"
    Then I see a 6-photo slideshow
    And the following photos are on the page:
      | /media/images/stations/16/1-4.jpg |
      | /media/images/stations/16/1-5.jpg |
      | /media/images/stations/16/1-6.jpg |
      | /media/images/stations/16/1-7.jpg |
      | /media/images/stations/16/1-8.jpg |
      | /media/images/stations/16/1-9.jpg |
      
  Scenario: Viewing nearby stations
    When I visit "/places/view/2"
    Then there are 2 nearby stations
    And I see the following nearby stations:
      | 3    | Gambetta |
      | 3bis | Gambetta |