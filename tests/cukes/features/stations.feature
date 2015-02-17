#encoding: utf-8

Feature: Stations
  In order to browse the Stations
  As a visitor 
  I should be able to view all relevant information on a given Station
  
  Background:
    Given the fixtures are in place
    
  Scenario: Viewing header
    When I visit "/stations/view/12"
    Then I see the "h1" element "Gambetta"
    And I see the "h1" element "3bis"
    
  Scenario: Viewing content
    When I visit "/stations/view/12"
    Then I see "the running tunnels for the old Line 3"
    
  Scenario: Using connections
    When I visit "/stations/view/12"
    And I press the "(3) Gambetta" link
    Then the URL should be "/stations/view/43"
    
  Scenario: Using places
    When I visit "/stations/view/12"
    Then I see the "#nav-station-places h2" element "Places"
    And I see "Not yet implemented"