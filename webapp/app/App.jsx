import React from "react";
import {Col, Row, Button} from 'react-bootstrap';

import Game from './Game.jsx';
import ObserverMode from './ObserverMode.jsx'

export default class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      observerMode: false,
      gameMode: false
    }
    this.startGameMode = this.startGameMode.bind(this);
    this.startObserverMode = this.startObserverMode.bind(this);

  }
  startGameMode() {
    this.setState({
      observerMode: false,
      gameMode: true
    });
  }
  startObserverMode() {
    this.setState({
      observerMode: true,
      gameMode: false
    });
  }
  render() {
    if (this.state.observerMode) {
      return (
        <div>
          <ObserverMode />
        </div>
      );
    }
    if (this.state.gameMode) {
      return (
        <div>
          <Game />
        </div>
      );
    }
    return (
      <div>
      Pick your mode ...
        <Row>
          <Col xs={6} md={6}>
            <Button onClick={this.startGameMode}>Game Mode</Button>
          </Col>
          <Col xs={6} md={6}>
            <Button onClick={this.startObserverMode}>Observer Mode</Button>
          </Col>
        </Row>
      </div>
    )
  }
};
