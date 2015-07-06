#encoding: utf-8
@active
Feature: Stations - Environment audio
  As a passenger,
  I want to be able to hear environmental audio in a Station
  To increase the reality of the experience
  
  Background:
    Given the fixtures are in place
    
  Scenario: Station has no audio
    When I visit "/stations/view/1"
    Then there is 0 audio
    And I don't see "Station ambience"
        
  Scenario: Station has ambience audio
    When I visit "/stations/view/2"
    Then there is 1 audio
    And I see "Station ambience"
    
  Scenario: User starts audio
    #pending
    
  Scenario: User stops audio
    #pending