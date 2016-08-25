[![Stories in Ready](https://badge.waffle.io/WeCamp/island-of-the-dead.png?label=ready&title=Ready)](https://waffle.io/WeCamp/island-of-the-dead)
# team-jasper

## FrontEnd Application (webapp) ##

### Development mode ###
Run `npm run dev` to start gulp which will build the project and start the watcher so changed files are being retranspiled to the build folder.
Run `npm run dev-server` to start nodemon and run server.js in development mode, so every change made to the sourcecode will result in a restart of the server.

### Production mode ###
Run `npm run build` to start gulp, build the project and copy it to the build folder.
Run `npm start` to start server.js which will expose the contents of the build folder.

## BackEnd Application (api) ##

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
