import React from "react";
import {Col, Row, Button} from 'react-bootstrap';

import Game from './Game.jsx';
import ObserverMode from './ObserverMode.jsx'
import Title from './Title.jsx';

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
        <div classname="game">
          <Title title="Island of the Dead" subtitle=" - by Team Lost"/>
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
      <div className="menu">
        <Title title="Island of the Dead" subtitle=" - by Team Lost"/>
        <Row className="text">
          <Col xs={12} md={12} lg={12}>
            <marquee>Pick your mode ...</marquee>
          </Col>
        </Row>
        <Row className="button-area">
          <Col xs={12} md={6} lg={6}>
            <Button className="button" onClick={this.startGameMode}>Game Mode</Button>
          </Col>
          <Col xs={12} md={6} lg={6}>
            <Button className="button" onClick={this.startObserverMode}>Observer Mode</Button>
          </Col>
        </Row>
      </div>
    )
  }
};
