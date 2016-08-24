[![Stories in Ready](https://badge.waffle.io/WeCamp/island-of-the-dead.png?label=ready&title=Ready)](https://waffle.io/WeCamp/island-of-the-dead)
# team-jasper

Phpspec:
To run the tests:
phpspec run

It will run the tests in api/spec (of which there is only one at present).

HelloWorld:
The test simply ensures that the test object hello world is initialiseable , created by the following command :   
./vendor/bin/phpspec describe 'Application\HelloWorld'

The test uses this phpspec-type assert to check the class type.
   $this->shouldHaveType(HelloWorld::class);
   
Setup Structure for API:

bootstrapping:
/api/app 

domain logic:
/api/src/Application/Controller
/api/src/Application/Entity

tests
/api/spec   Phpspec tests
