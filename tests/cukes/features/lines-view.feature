#encoding: utf-8

Feature: Lines - View
  As a passenger,
  I want to see a list of stations available on a Line
  So that I can start exploring
  
  Background:
    Given the fixtures are in place

  Scenario: Viewing page
    When I visit "/lines/view/4"
    Then I see the "h1" element "Line 3bis"
    And I see "Line 3bis used to be part of Line 3 before 1971"
    
  Scenario: Station list
    When I visit "/lines/view/4"
    And I press the "Pelleport" link
    Then the URL should be "/stations/view/11"