#encoding: utf-8
Feature: Admin - Movements
  In order to manage Movements
  As an administrator 
  I should be able to add, edit and delete Movements
  
  Background:
    Given the fixtures are in place
    And an administrator named Admin
    And a set of Movement data called "the sample"
    And a set of Movement data called "the changed sample"
    
  Scenario: Viewing Movement
    Given I am logged in as "Admin"
    When I visit "/admin/movements/view/3"
    Then I see the following table:
      | Id | Up Station Id | Down Station Id | Up Allowed | Down Allowed | Length |
      | 3  | Madeleine     | Pyramides       | 1          | 1            |        |
 
  Scenario: Adding Movement
    Given I am logged in as "Admin"
    When I visit "/admin/movements/add"
    And I fill the Movements form with "the sample"
    And I press the "Submit" button
    Then I see "The movement has been saved."
    
  Scenario: Editing Movement
    Given I am logged in as "Admin"
    When I visit "/admin/movements/edit/12"
    And I fill the Movements form with "the changed sample"
    And I press the "Submit" button
    Then I see "The movement has been saved."
    
  Scenario: Deleting Movement
    Given I am logged in as "Admin"
    When I visit "/admin/movements/view/18"
    And I press the "Delete Movement" link
    Then I see "The movement has been deleted."
    
  Scenario: Accessing without permission
    Given I am logged in as "User"
    When I try to visit "/admin/movements/add"
    Then I see an error message