import React from 'react';
import Container from 'react-bootstrap/Container';
import Navbar from 'react-bootstrap/Navbar';

const Header: React.FC = () => {
    return (
        <Navbar className="bg-body-tertiary">
            <Container>
            <Navbar.Brand href="#home">
                <img
                alt=""
                src="./assets/img/logo.png"
                width="140"
                height="50"
                className="d-inline-block align-top"
                />
            </Navbar.Brand>
            </Container>
        </Navbar>
    );
}

export default Header;