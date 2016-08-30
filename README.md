[![Stories in Ready](https://badge.waffle.io/WeCamp/island-of-the-dead.png?label=ready&title=Ready)](https://waffle.io/WeCamp/island-of-the-dead)
# Island of the Dead

Made by: **Team Lost**

* [Jen Cockerill](https://twitter.com/jencockers)
* [Joralf Quist](https://twitter.com/Koekenbakker28)
* [Martin Westra](https://twitter.com/diewom)
* [Rob Stocker](https://twitter.com/Techbot)
* [Steven de Vries](https://twitter.com/Stedv)

**Honourable mention to our WeCamp coach: [Jasper N. Brouwer](https://twitter.com/jaspernbrouwer)**

## FrontEnd Application (webapp) ##

### Development mode (local, prerequiste: install node.js) ###
- Run `npm run dev` to start gulp which will build the project and start the watcher so changed files are being retranspiled to the build folder.
- Run `npm run dev-server` to start nodemon and run server.js in development mode, so every change made to the sourcecode will result in a restart of the server. Website is visible on http://localhost:7777

### Production mode (vagrant box) ###
- Run `npm run build` or `gulp` to start gulp, build the project and copy it to the build folder.
- Run `npm start` to start server.js which will expose the contents of the build folder. Website is now visible port 7777 with the ip address of your vagrant box.

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
