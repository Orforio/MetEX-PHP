#encoding: utf-8
@active
Feature: Stations - Previous/Next station navigation
  As a passenger,
  I want to be able to view the next and previous stations to the one I'm on
  So that I can travel the line sequentially
  
  Background:
    Given the fixtures are in place
    
  Scenario: Station in the middle of a line
    When I visit "/stations/view/10"
    Then I see the "#nav-station-down" element "Pelleport"
    And I see the "#nav-station-up" element "Porte des Lilas"
    When I press the "Porte des Lilas" link
    Then the URL should be "/stations/view/9"
    
  Scenario: Simple line with only two termini - Up terminus
    When I visit "/stations/view/9"
    Then I see the "#nav-station-down" element "Saint-Fargeau"
    And I see the "#nav-station-up" element "Terminus"
    And I cannot click on "Terminus"
    When I press the "Saint-Fargeau" link
    Then the URL should be "/stations/view/10"
    
  Scenario: Simple line with only two termini - Down terminus
    When I visit "/stations/view/12"
    Then I see the "#nav-station-down" element "Terminus"
    And I see the "#nav-station-up" element "Pelleport"
    And I cannot click on "Terminus"
    When I press the "Pelleport" link
    Then the URL should be "/stations/view/11" 
  
  Scenario: Line with a loop in the middle
    pending
  
  Scenario: Line terminating in a loop
    pending
  
  Scenario: Line with one or more branches
    pending