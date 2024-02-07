import React from "react";
import Header from "../../components/header/Header";
import './Home.css'
import Footer from "../../components/footer/Footer";
import Stove from "../../models/Stove/Stove";

const Home:React.FC = () => {
    return (
        <div className="App">
            <Header />
            <Stove />
            <Footer />
        </div>
    );
}

export default Home;