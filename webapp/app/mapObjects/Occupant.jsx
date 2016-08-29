import React from 'react';

export default class Occupant extends React.Component {

  render() {
    var rotation = Math.round(Math.random()*360);
    if (this.props.type !== 'Exit') {
      var styles = {
        "transform": `rotate(${rotation}deg)`,
      }
    }
    
    return (
       <div key={this.props.index} className={this.props.type} style={styles}>

       </div>
    );
  }
}
