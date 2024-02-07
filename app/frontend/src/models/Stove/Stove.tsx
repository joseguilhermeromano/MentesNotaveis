import '../../interfaces/StoveProps';
import '../../interfaces/ColorProps';
import React from 'react';
import './Stove.css';
import LightModeIcon from '@mui/icons-material/LightMode';

class Stove extends React.Component{
    constructor({ colorProps }:StoveProps){
        super({colorProps});
        this.state = {
            colorProps: {body: "red", panelButtons: "", panelBurners: "", mainGlass: "", dividerBodyLegs: "", baseLegs: "", legs: ""}
        }
    }

    render(){
        return (
            <div className="container-stove">
                <div className="glass"></div>
                <div className="divider-glass"></div>
                <div className="panel-burners">
                    <div className="burner-one"></div>
                    <div className="burner-two"></div>
                    <div className="burner-three"></div>
                    <div className="burner-four"></div>
                </div>
                <div className="panel-buttons">
                    <div className="button-lamp-oven"><LightModeIcon /></div>
                    <div className="button-burner-one"></div>
                    <div className="button-burner-two"></div>
                    <div className="button-burner-three"></div>
                    <div className="button-burner-four"></div>
                    <div className="button-burner-five"></div>
                </div>
                <div className="body-stove">
                    <div className="mark-stove">BRASTEMP</div>
                    <div className="oven-stove">
                        <div className="handle-oven"></div>
                        <div className="glass-oven">
                        </div>
                    </div>
                </div>
                <div className="divider-body-legs">
                </div>
                <div className="base-legs">
                </div>
                <div className="legs">
                    <div className="leg-one">
                    </div>
                    <div className="leg-two">  
                    </div>
                </div>
                <div className="shadow">
                </div>
            </div>
        );
    }
}

export default Stove;