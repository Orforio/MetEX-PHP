#encoding: utf-8

@active
Feature: Stations - Connections
  As a passenger,
  I want to be able to see available interchanges at the current station
  So that I can switch between lines
  
  Background:
    Given the fixtures are in place
    
  Scenario: Station does not belong to an interchange and connects to no lines
    When I visit "/stations/view/7"
    Then there are 0 connections
    
  Scenario: Station belongs to an interchange and connects to one line
    When I visit "/stations/view/6"
    Then there is 1 connection
    And I see the following connections:
      | 6        | Bercy       |
    
  Scenario: Station belongs to an interchange and connects to two or more lines
    When I visit "/stations/view/1"
    Then there are 2 connections
    And I see the following connections:
      | 3        | Saint-Lazare |
      | 12       | Saint-Lazare |