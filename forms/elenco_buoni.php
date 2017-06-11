

<div ng-controller="searchCtrl">
    <input type="text" ng-model="search" size="100%" placeholder="Cerca Codice Fiscale, Barcode.." width="100px">
	<table class="table table-striped">
    	<thead>
      	<tr>
		 	<th>Ricevuta</th>
        	<th>Barcode</th>
        	<th>Data</th>
			<th>Nome</th>
			<th>Cognome</th>
			<th>Buoni</th>
			<th>Buoni 2</th>
			<th>Buoni 3</th>
      	</tr>
    </thead>
    <tbody>
    	<tr ng-repeat="item in items.data|filter: search">
        	<td>{{item.Ricevuta}}</td>
        	<td>{{item.Barcode}}</td>
        	<td>{{item.Data}}</td>
			<td>{{item.Nome}}</td>
			<td>{{item.Cognome}}</td>
			<th >{{item.carnet}}</th>
			<th ng-if="item.carnet1 !=0">{{item.carnet1}}</th>
			<th ng-if="item.carnet2 !=0">{{item.carnet2}}</th>
			
    	</tr>
    </tbody>
  </table>
</div>

