class Selector extends React.Component {
	constructor(props) {
        super(props);
        this.tipi = tipi;
        this.state = {
            count: 1,
            selectors: [ 0 ],
        }

        this.rimuovi = this.rimuovi.bind(this);
        this.aggiungi = this.aggiungi.bind(this);
	}

    rimuovi(id, e) {
        selectors = this.state.selectors;
        selectors = selectors.filter((s) => {
            return id != s;
        });
        this.setState({
            selectors: selectors,
        });
    }

    aggiungi(e) {
        this.state.selectors.push(this.state.count);
        this.setState({
            selectors: this.state.selectors,
            count: this.state.count+1,
        });
    }

    render() {
        rimuovi = this.rimuovi;
        s = this.state.selectors.map(function(sel) {
            return (
                <SelectorVestito
                    key={sel}
                    id={sel}
                    rimuovi={rimuovi}
                    tipi={this.tipi}
                />
            );
        });
        return (
            <div className="row mt-2">
                {s}
                <AggiungiButton 
                    aggiungi={this.aggiungi}
                />
            </div>
        );
    }
}

class SelectorVestito extends React.Component {
	constructor(props) {
        super(props);
        this.tipi = this.props.tipi.map((tipo) => {
            return (
                <option value={tipo.id}>
                    {tipo.nome}
                </option>
            );
        });
        this.state = {image: '#',
            tipoSelezionato: false,
            vestitoSelezionato: false,
        };

        this.tipoChange = this.tipoChange.bind(this);
        this.vestitiSuccess = this.vestitiSuccess.bind(this);
        this.vestitoChange = this.vestitoChange.bind(this);
	}

    tipoChange(e) {
        $.ajax({url:'/vestiti/tipo/'+e.target.value, success: this.vestitiSuccess});
    }

    vestitiSuccess(result) {
        this.setState({
            tipoSelezionato: true,
            vestiti: result.map((vestito) => {
                return (
                    <VestitoOption img={vestito.immagine}
                        nome={vestito.nome}
                        id={vestito.id} />
                );
            }),
        });
    }

    vestitoChange(e) {
        vestito = this.state.vestiti.find(function (vestito)
            {
                return vestito.props.id == e.target.value;
            });
        this.setState({
            vestitoSelezionato: true,
            image: '/images/'+vestito.props.img,
        });
    }

    render() {
        vestiti = this.state.tipoSelezionato ? this.state.vestiti : null;
        imgVestito = this.state.vestitoSelezionato ?
                (<img id="vestito_image" src={this.state.image} className="my-2 img-fluid" />)
                :
                null;

        return (
            <div className="offset-md-3 col-md-6 border shadow-small my-2 p-2 text-center">
                {imgVestito}

                <select onChange={this.tipoChange} name="tipo[]" className="col-12 form-control">
                    <option value="" disabled selected={true}>
                        Scegli una tipologia
                    </option>

                    {this.tipi}

                </select>

                <select onChange={this.vestitoChange} className="col-12 mt-2 form-control" name="vestito[]" disabled={!this.state.tipoSelezionato} >
                    <option className="vestito" value="" disabled selected={true}>
                        Vestito
                    </option>
                    {vestiti}
                </select>

                <button type="button" onClick={(e) => this.props.rimuovi(this.props.id, e)} className="col-12 mt-2 btn btn-danger">
                    Rimuovi
                </button>
            </div>
        );
    }
}

class VestitoOption extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        vestito = this.props;
        return (
            <option className="vestito" value={vestito.id}>
                {vestito.nome}
            </option>
        );
    }
}

class AggiungiButton extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div className="col-12 offset-md-3 col-md-6 border shadow-small p-2 text-center">
                <a id="aggiungi" onClick={this.props.aggiungi} href="#">
                    <img src="/images/plus.svg" className="img-fluid" />
                </a>
            </div>
        );
    }
}

const container = document.getElementById('selezioni');
ReactDOM.render(<Selector />, container);
