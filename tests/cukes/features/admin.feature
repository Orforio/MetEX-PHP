#encoding: utf-8

Feature: Admin
  As a passenger,
  I should not be able to access any admin panel
  So that I cannot change data
  
  Background:
    Given the fixtures are in place
    
  Scenario: Station
    When I try to visit "/admin/stations/"
    Then I see an error message
    When I try to visit "/admin/stations/add"
    Then I see an error message
    When I try to visit "/admin/stations/edit/1"
    Then I see an error message
    When I try to visit "/admin/stations/delete/1"
    Then I see an error message
    
  Scenario: Line
    When I try to visit "/admin/lines/add"
    Then I see an error message
    When I try to visit "/admin/lines/edit/1"
    Then I see an error message
    When I try to visit "/admin/lines/delete/1"
    Then I see an error message
    
  Scenario: Image
    When I try to visit "/images/"
    Then I see an error message
    When I try to visit "/admin/images/"
    Then I see an error message
    When I try to visit "/admin/images/add"
    Then I see an error message
    When I try to visit "/admin/images/edit/1"
    Then I see an error message
    When I try to visit "/admin/images/delete/1"
    Then I see an error message
    
  Scenario: Movement
    When I try to visit "/movements/"
    Then I see an error message
    When I try to visit "/admin/movements/"
    Then I see an error message
    When I try to visit "/admin/movements/add"
    Then I see an error message
    When I try to visit "/admin/movements/edit/1"
    Then I see an error message
    When I try to visit "/admin/movements/delete/1"
    Then I see an error message
    
  Scenario: Interchange
    When I try to visit "/interchanges/"
    Then I see an error message
    When I try to visit "/admin/interchanges/"
    Then I see an error message
    When I try to visit "/admin/interchanges/add"
    Then I see an error message
    When I try to visit "/admin/interchanges/edit/1"
    Then I see an error message
    When I try to visit "/admin/interchanges/delete/1"
    Then I see an error message
    
 # Tests will only pass if site debug setting is set to live