import React from "react";
import {Col, Row} from 'react-bootstrap';

export default class Title extends React.Component {
  constructor(props) {
    super(props);
  }
  render() {
    return (
      <Row className="title">
        <Col xs={12} md={12} lg={12}>
          <h1>{this.props.title}</h1>
          <h3>{this.props.subtitle} </h3>
        </Col>
      </Row>
    )
  }
};
