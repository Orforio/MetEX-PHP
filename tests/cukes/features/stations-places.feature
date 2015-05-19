#encoding: utf-8
@active
Feature: Stations - Places
  As a passenger,
  I want to be able to see places near the current station
  So that I can explore more of the network and city
  
  Background:
    Given the fixtures are in place
    
  Scenario: Station is not near any places
    When I visit "/stations/view/7"
    Then there are 0 nearby places
    And I see "No places nearby"
    
  Scenario: Station is near 1 place
    When I visit "/stations/view/1"
    Then there is 1 nearby place
    And I see the following nearby places:
      | Saint-Lazare station |
      
  Scenario: Station is near 2 places
    When I visit "/stations/view/43"
    Then there are 2 nearby places
    And I see the following nearby places:
      | Gambetta station              |
      | Old running tunnels, Gambetta |