import React from 'react';
// import classnames from 'classnames';

export default class Occupant extends React.Component {
  render() {
    // const cn = classnames({
    //   [`${this.props.type}`]: true,
    // });
    return (
       <div key={this.props.index} className={this.props.type}>

       </div>
    );
  }
}
