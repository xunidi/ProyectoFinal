import React, { Component } from 'react';
import ReactDOM from 'react-dom';

const baseUrl = "http://localhost/example/laravel-react/public/";

export default class Pedido extends Component {
   
     constructor(props){
      // variables
      super(props);
      this.state = {
        inventario:[],
        pedido:[],
        pedidoBackup:[],
        textBuscar:'',
        formIdinventario:'',
        formProducto:'',
        formDescripcion:'',
        formCantidad:'',
        idInventario:0,
        idProducto:0,
        edit:false
      }
      // funciones de onchange de los campos en el formulario
     /* this.handleChangeCliente = this.handleChangeCliente.bind(this);
      this.handleChangeProducto = this.handleChangeProducto.bind(this);
      this.handleChangeCant  = this.handleChangeCant.bind(this);*/

    }

    componentDidMount(){
      this.loadDataPedido()
      //this.loadDataProductos()
    }

    loadDataPedido(){

      axios.get(baseUrl+'api/pedido/list').then(response=>{
          this.setState({
            pedido:response.data,
            pedidoBackup:response.data
          })
       }).catch(error=>{
         alert("Error "+error)
       })

    }

    render() {
        const {pedido} = this.state;
        console.log('pedido',pedido);
        return (
          <div class="container">
                <br/>
                <h3>Pedido</h3>
                <hr/>

                <table class="table table-bordered order-table ">
              <thead>
                <tr>
                  <th>Numero de pedido</th>
                  <th>Cliente</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody id="bodytable">
                  {/*this.listData()*/}
              </tbody>
            </table>
          </div>
        )
    }

    listData(){
        console.log('data',this.state.pedido);
        return this.state.pedido.map((data)=>{
          return(
            <tr>
              <td>{data.id_pedido}</td>
              <td>{data.nombre}</td>
              <td>{data.titulo}</td>
              <td>{data.cant_pedido}</td>
              <td>{data.fecha}</td>
              <td>
              {/*<button class="btn btn-info" onClick={()=>this.showModalEdit(data)}>Editar</button>*/}
              <br/>
              {/*<button class="btn btn-danger" onClick={()=>this.showModalDelete(data)}>Eliminar</button>*/}
            </td>
            </tr>
          )
  
        })
  
      }

}

if (document.getElementById('pedido')) {
    ReactDOM.render(<Pedido />, document.getElementById('pedido'));
}