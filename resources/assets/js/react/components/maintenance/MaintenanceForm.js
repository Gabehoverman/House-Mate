import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ClipLoader } from 'react-spinners';
import Notification from '../Notification';
import MaintenanceTable from './MaintenanceTable';
import Maintenance from '../../pages/Maintenance';
 
/* An example React component */
export default class MaintenanceForm extends React.Component {

    constructor(props) {
        super(props);
        this.state = this.props.state;
        this.state = {
            amount: [],
        }
      }

    HideModal() {
        this.props.state.showMaintenanceForm = false;
        this.setState({
            showMaintenanceForm: false,
        }) 
      }

    handleSubmit(event) {
        event.preventDefault();
        var submission = {
            amount: this.amount.value,
            notes: this.notes.value,
        }
        this.setState({
        })
        this.newMaintenance(JSON.stringify(submission));
        alert('Submitted!');
      }

      newMaintenance(data) {
          console.log(data);
        fetch('/api/v1/maintenance',{
            method: 'POST',
            credentials: 'same-origin',
            headers: new Headers({
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }),
            body: data,
          })
          .then(function(response) {
              return response.json();
          })
          .then(
            (myJson) => {
                $('.maintenanceTable tr:last').after(`<tr id={myJson.id}>
                <td>`+myJson.id+`</td>
                <td>`+myJson.notes+`<td>
                <td>`+myJson.notes+`<td>
                </tr>`);
                this.setState({
                'this.state.maintenance': this.props.state.maintenance.concat(myJson),
              });
              Notification.openNotificationWithIcon('success','Successfully Added')
          });
    }

    render() {
        if (this.props.state.showMaintenanceForm == true )
        return (
            <div id="myModal" class="modal show" role="dialog" show="true">
            <form onSubmit={this.handleSubmit.bind(this)}>
            <div class="modal-dialog">

                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onClick={this.HideModal.bind(this)}  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Maintenance Details</h4>
                </div>
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="amount">Maintenance Amount</label>
                        <input type="text" step="00.01"  ref={(input) => this.amount = input} value={this.amount} class="form-control" id="amount" aria-describedby="amount" placeholder="Amount"/>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea type='text' ref={(input) => this.notes = input} row="5" class="form-control" id="message-text"></textarea>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onClick={this.HideModal.bind(this)} class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </div>
                </div>

            </div>
            </form>

            </div>
        );
        else {
            return (<div />)
        }
    }
}