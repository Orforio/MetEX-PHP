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
    
  Scenario: Viewing navigation
    When I visit "/stations/view/12"
    Then I see the "#nav-station-up" element "Pelleport"
    And I see the "#nav-station-down" element "Terminus"
    
  Scenario: Using navigation
    When I visit "/stations/view/12"
    And I press the "Pelleport" link
    Then the URL should be "/stations/view/11"
    
  Scenario: Viewing content
    When I visit "/stations/view/12"
    Then I see a 3-photo carousel
    And I see "the running tunnels for the old Line 3"
    
  Scenario: Viewing connections
    When I visit "/stations/view/12"
    Then I see the "#nav-station-connections h3" element "Connections"
    And I see the "#nav-station-connections ul li a" element "3: Gambetta"
    
  Scenario: Using connections
    When I visit "/stations/view/12"
    And I press the "3: Gambetta" link
    Then the URL should be "/stations/view/43"
    
  Scenario: Using places
    When I visit "/stations/view/12"
    Then I see the "#nav-station-places h3" element "Places"
    And I see "Not yet implemented"