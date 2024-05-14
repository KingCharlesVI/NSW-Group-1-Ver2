import React from 'react';
import { Routes, Route, Link } from 'react-router-dom';

function Navbar() {
  return (
    <header className="navbar">
      <div className="logo-container">
        <Link to="/" className="back-to-homepage">
          <img src="/images/logo.png" alt="NSWG1 Logo" className="navbar-logo" />
          <h2 className="navbar-title">NSWG1</h2>
        </Link>
      </div>
      <div className="navbar-links">
        <div className="navbar-links-socials">
          <div className="dropdown">
            <button className="dropbtn">Units</button>
            <div className="dropdown-content">
              <Link to="/nsw">NSW</Link>
              <Link to="/tf160">TF-160th</Link>
              <Link to="/afsoc">AFSOC</Link>
            </div>
          </div>
          <a href="https://youtube.com/playlist?list=PLmEj_ICG-GitF5XcFYie0cCW93e4N6VUJ&si=qDDAZoHGupJSGEwx" target="_blank" rel="noopener noreferrer" className="navbar-links-socials">Youtube</a>
          <a href="https://discord.gg/5W27B3xnw6" target="_blank" rel="noopener noreferrer" className="navbar-links-socials">Discord</a>
          <Link to="/application-form" className="signup-link">ENLIST</Link>
          <Link to="/login" className="private-link">LOG IN</Link>
        </div>
      </div>
    </header>
  );
}

export default Navbar;