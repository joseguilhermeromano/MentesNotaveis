import React from 'react';
import { Favorite } from "@material-ui/icons"
import './Footer.css'

const Footer: React.FC = () => {
    return (
        <div className="footer">
            Desenvolvido com <Favorite className='style-heart'/> por José Guilherme
        </div>
    );
}

export default Footer;