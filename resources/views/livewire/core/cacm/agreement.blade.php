<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Client Agreement List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadPayroll" class="btn btn-success"><i class='fa fa-edit'></i> Create Contract</button>
            <x-table head="">
                <thead>
                    <th class="text-center">Client Name</th>
                    <th class="text-center">Client Location</th>
                    <th class="text-center">Contract Term</th>
                    <th class="text-center">Status</th>
                </thead>
                <tbody>
                    @forelse ($onboards as $onboard)
                          <tr>
                            <td class="text-center">{{$onboard->client_name}}</td>
                            <td class="text-center">{{$onboard->client_location}}</td>
                            <td class="text-center">{{$onboard->contract_term}}</td>
                            <td class="text-center">
                                <button wire:click="viewModal({{$onboard->id}})" class="btn btn-primary" ><i class='fa fa-eye'></i> View</button>
                            </td>
                          </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Record Found</td>
                            </tr>
                        @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="aggreement" maxWidth="lg">
        <x-slot name="title"><h2><strong>
            {{ __('COMPANY CONTRACT AGREEMENT') }}</strong></h2>
            
        </x-slot>
        <x-slot name="content">
            <h2><strong></strong></h2>
            <p>This Agency Agreement is entered into as of <u><b>_____________</b></u> by and between 
                <strong>Tech-Trendz</strong> having its principal place of business located at Quezon City (the “Company”) and [Client.] <u><b>_____________</b></u> 
                having its principal place of business located at <u><b>_____________</b></u>(the “Agent”), both of whom agree to be bound by this Agreement.</p>
            <p>WHEREAS, the Company offers customers certain products, as described on the document attached hereto as Exhibit A (the “Products”); and
            WHEREAS, the Company and the Agent desire to enter into an agreement whereby the Agent will market and sell the Product according to the terms and conditions herein.</p>
            <p>NOW, THEREFORE, in consideration of the mutual covenants and promises made by the parties hereto, the Company and the Agent (individually, each a “Party” and collectively, the “Parties”) covenant and agree as follows:</p>
            <ul><p>1.	Assignment of Right
            <ul>a.	With certain limitations stated herein, the Company hereby authorizes the Agent the right to market and offer for sale the Products according to the terms and limitations stated in this Agency Agreement.</ul>
            <ul>b.	The Company reserves the right to add to or subtract from the list of Products authorized on Exhibit A attached hereto with notice to the Agent.</ul></p></ul>
            <ul><p>2.	Territory - 
            The Agent shall be authorized to market the Product in (the “Territory”).</p></ul>
            <ul><p>3.	Exclusivity - 
            The Agent shall be the exclusive party authorized to market the Product within the Territory.</p></ul>
            <ul><p>4.	Trademark Rights - 
            The Agent agrees and acknowledges the following with regard to the Company’s trademark:
            <ul>a.	The Company is the sole and exclusive owner to all rights, title, and interest in “Trademark” or to any other trademarks associated with the Company (the “Company Trademarks”) that the Agent may utilize in performing the services herein.</ul>
            <ul>b.	The Company hereby grants to the Agent for the duration of this Agreement and subject to the 
            limitations stated within this Agreement a non-exclusive, non-transferable, revocable right to use the Company Trademarks as necessary to market and offer for sale the Products within the Territory.</ul></p></ul>
            <ul><p>5.	Agent Responsibilities - 
            In marketing and offering the Products for sale in the Territory, the Agent shall:
            <ul>a.	Act with diligence, devoting reasonable time and effort to fulfill the duties described herein;</ul>
            <ul>b.	Maintain reasonable technical and practical knowledge with regard to the Products;</ul>
            <ul>c.	Utilize promotional materials provided to the Agent by the Company for the purpose of marketing and selling the Products;</ul>
            <ul>d.	If requested by the Company, attend and participate in trade shows and conventions related to the Products;</ul>
            <ul>e.	Promptly respond to all communications by customers and the Company regarding the Products;</ul>
            <ul>f.	Reasonably assist the Company with regard to any and all collection matters as requested by the Company;</ul>
            <ul>g.	Prepare and maintain any reports and documentation, as requested by the Company.</ul></p></ul>
            <ul><p>6.	Commission - 
            The Company shall pay to the Agent 20% of all Net Product Sales directly from the Agent’s efforts. “Net Product Sales” shall be defined as the amount of sales revenue from any sales made by the Agent less any chargebacks, returns, or defaults by customers.
            <ul>a.	Should the Parties terminate this Agreement for any reason, the Company shall pay the Agent only for sales of the Products made prior to the termination date.</ul>
            <ul>b.	In the event that the Agent receives commission payments for orders that are subsequently refunded, charged back, or the 
            Company otherwise fails to realize the income from such a sale, the Agent shall offset any future commissions paid by the amount by which the commissions actually paid would be reduced if the sales associated with income the Company failed to realize were never completed.</ul>
            <ul>c.	Payments shall be made to the Agent on or before May 12 for the period.</ul></p></ul>
            <ul><p>7.	Confidentiality
            <ul>a.	The Agent shall not disclose to any third party any details regarding the Company’s business, including, without limitation any information regarding any of the Company’s customer information, business plans, or price points (the “Confidential Information”), 
            (ii) make copies of any Confidential Information or any content based on the concepts contained within the Confidential Information for personal use or for distribution unless requested to do so by the Company, or (iii) use Confidential Information other than solely for the benefit of the Company.</ul>
            <ul>b.	Immediately upon termination of the relationship between the Company and the Agent, the Agent shall return to the Company any documents pertaining to the Company’s business or any of its trade secrets which are in the Agent’s possession.</ul></p></ul>
            <ul><p>8.	Term and Termination
            <ul>a.	This Agreement shall commence upon the date of execution and continue until either Party terminates this Agreement in writing.</ul>
            <ul>b.	Upon such termination, the Agent shall cease marketing and offering for sale the Products and shall continue to abide by the obligation refrain from sharing with any third party any of the Company’s confidential information.</ul></p></ul>
            <ul><p>9.	Indemnification - 
            The Agent agrees to indemnify, defend, and protect the Company from and against all lawsuits and costs of every kind pertaining to any violation of the law, this Agreement, or the rights of any third party by the Agent while acting pursuant to this Agreement. Such costs include but are not limited to reasonable legal fees.</p></ul>
            <ul><p>10.	No Modification Unless in Writing - 
            No modification of this Agreement shall be valid unless in writing and agreed upon by both Parties.</p></ul>
            
            IN WITNESS WHEREOF, by execution by the parties below, this Service-Level Agreement will form a part of the Contract.
            <br>
            <br>
            <br>
                ____________________
            <br>Company: Tech-Trendz
            <br>
            <br>
                ____________________
            <br>Client: 
            <br><br>
            <div class="form-group">
                <label for="">Client Name</label>
                <input wire:model="client_name"class="form-control" type="text">
                @error('client_name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Client Location</label>
                <input wire:model="client_location"class="form-control" type="text">
                @error('client_location') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Contract Term</label>
                <input wire:model="contract_term"class="form-control" type="text">
                @error('contract_term') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('aggreement')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="aggreementSave" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="contractModal">
        <x-slot name="title">
            {{ __('') }}
            
        </x-slot>
        <x-slot name="content">
            @include('contract')
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('contractModal')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Close') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="download" wire:loading.attr="disabled"><i class='fa fa-download'></i>
                {{ __('Download') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
