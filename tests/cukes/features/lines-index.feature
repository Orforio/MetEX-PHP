#encoding: utf-8

Feature: Lines - Index
  As a passenger,
  I want to be able to see all the Lines available
  So that I can start exploring the site
  
  Background:
    Given the fixtures are in place

  Scenario: Viewing index
    When I visit "/lines"
    Then I see the "h1" element "Lines"
    
  Scenario: Active line
    When I visit "/lines"
    Then I see "Line 7bis was originally part of Line 7 before 1967"
    When I press the "Line 7bis" link
    Then the URL should be "/lines/view/9"
    
  Scenario: Inactive line
    When I visit "/lines"
    Then I don't see "13"