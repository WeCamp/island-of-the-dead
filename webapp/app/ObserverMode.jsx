import React from "react";
import Col from 'react-bootstrap';
import Row from 'react-bootstrap';
import ObserverMap from './ObserverMap.jsx';
const API_URL = 'http://island-of-the-dead.stevendevries.nl';
// LOCAL IP
//const API URL = 'http://islandofthedead.com';

export default class ObserverMode extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      status: null,
      gameId: 1,
      objectsInGame: null
    }
    this.timeout;
  }
  displayStateInConsole() {
    console.log("gameState:", this.state.status, "gameId:", this.state.gameId, "objectsInGame", this.state.objectsInGame);
  }
  componentDidMount() {
    console.log("componentDidMount");
    this.getGeoLocationAndUpdateMap();
    // this.getGeoLocationAndUpdateMap();
  }

  getGeoLocationAndUpdateMap() {
    fetch(`${API_URL}/game/${this.state.gameId}`)
      .then(function(response) {
        console.log("fetching data from backend");
        return response.json();
      })
      .then((jsonResponse) => {
        this.setState({
          gameId: this.state.gameId,
          status: jsonResponse.state,
          objectsInGame: jsonResponse.occupants
        });
      }).then(() => {
        this.timeout = setTimeout(() => {
          this.getGeoLocationAndUpdateMap();
        }, 5000);
      });
  }
  componentWillUnmount() {
    clearTimeout(this.timeout);
  }

  render() {
    {this.displayStateInConsole()}
    if (this.state.status === null) {
      return(
        <div className="maps-component">
          Game Loading ...
        </div>
      );
    }
    if (this.state.status === 'LOST') {
      return (
        <div className="maps-component">
          Game Lost By Player...
          <ObserverMap objects={this.state.objectsInGame} />
        </div>
      );
    }
    if (this.state.status === 'WON') {
      return (
        <div className="maps-component">
          Game Won By Player...
          <ObserverMap objects={this.state.objectsInGame} />
        </div>
      );
    }
    return (
      <div className="maps-component">
        <ObserverMap objects={this.state.objectsInGame} />
      </div>
    );
  }
};
