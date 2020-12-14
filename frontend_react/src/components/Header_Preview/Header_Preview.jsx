import React from 'react';
import './Header_Preview.scss';
import LogoOfiplus from '../../img/LogoOfiplus.png'

function Header_Preview () {

  return (
    <section className="header">
      <section className="header_top">
        <section className="header_top_logo">
          <img src={LogoOfiplus}></img>
        </section>
        <section className="header_top_navbar">
          <section className="header_top_navigation">
          </section>
          <hr className="header_top_separator" />
        </section>
      </section>
    </section>
  )
}

export default Header_Preview;