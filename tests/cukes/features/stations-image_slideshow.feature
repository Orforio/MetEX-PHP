#encoding: utf-8
@active

Feature: Stations - Image slideshow
  As a passenger,
  I want to see a slideshow of images relating to the station I'm at
  So I can better understand the accompanying text description
  
  Background:
    Given the fixtures are in place
    
  Scenario: Images load from the database
    When I visit "/stations/view/11"
    Then I see a 3-photo slideshow
    And the following photos are on the page:
      | /media/images/stations/4/11-1.jpg |
      | /media/images/stations/4/11-2.jpg |
      | /media/images/stations/4/11-3.jpg |
    
  Scenario: Images scroll automatically
    When I visit "/stations/view/12"
    Then the following photos are visible:
      | /media/images/stations/4/12-1.jpg |
      | /media/images/stations/4/12-2.jpg |
      | /media/images/stations/4/12-3.jpg |
    
  Scenario: Images can be selected manually
    When I visit "/stations/view/10"
    Then the following photos are visible:
      | /media/images/stations/4/10-1.jpg |
    And when I press the "right"-arrow
    Then the following photos are visible:
      | /media/images/stations/4/10-2.jpg |
    And when I press the "left"-arrow
    Then the following photos are visible:
      | /media/images/stations/4/10-1.jpg |
    
  Scenario: Slideshow can be halted
    When I visit "/stations/view/9"
    Then the following photos are visible:
      | /media/images/stations/4/9-1.jpg |
    And when I hover over the slideshow
    Then the following photos are not visible:
      | /media/images/stations/4/9-2.jpg |
    
  Scenario: Image is missing
    When I visit "/stations/view/991"
    Then the following photos are visible:
      | /media/images/photo-not-available.jpg |