<div id="abundatrade_content_layout">
    <div id="top_content">
        <div id="abunda_please_wait">
           <div id="abunda_please_wait_msg">Getting real-time pricing, please wait...</div>
           <div id="abunda_please_wait_grx"></div>
        </div>        
    
        <!--top_input_section-->    
        <div id="top_input_section" class="calc_content_wrap">
          <form id="abundaInput" class="abundaInput" method="post">
            <input id="a" name="a" type="hidden" value="<?php echo get_option(MP_ABUNDA_PREFIX.'-affid'); ?>" />
            <input id="item_num" value="1" name="item_num" type="hidden"/>
        
            <div class="input_container">
              <div class="label">UPC or ISBN</div>
              <div class="input">
                <input class="validate['required','length[3,25]']" id="product_code" name="product_code" onblur="clean_product_code(this)" type="text"/>
              </div>
            </div>
        
            <div class="input_container">
              <div class="label"> Quantity </div>
              <div class="input">
                <input class="validate['required','digit[1,20]']" id="product_qty" name="product_qty" value="1" type="text"/>
              </div>
            </div>

            
            <div class="input_container_right"><a id="lookupItem" href="#" class="like-a-button">Lookup Item</a></div>
        </div>
        <!--//top_input_section-->
        <div class='clear'></div>
        
        <!-- second row -->
        <div id="second_input_section" class="input_container">
        
        <div class="input_container">
        <div class="label">Item Count:</div>
            <div id="total_item_count" class="input_text">0</div>
        </div>
          <div class="input_container">
            <div class="label">Offer<sup>*</sup>:</div>
            <div id="total_prevaluation" class="input_text">$0.00</div>
          </div>
         <div class="input_container_right"><a id="submitList" href="#" class="like-a-button">Submit List</a></div>
        </div>
        <!--//second_content-->
    </div>
    <!--//top_content-->    

    <table cellspacing="0" cellpadding="0" id="abundaCalcTbl">
        <thead>
            <tr>
                <th class='line_number'>#</th>
                <th class='upc'>UPC</th>
                <th class='details'>Details</th>
                <th class='quantity'>Qty</th>
                <th class='item'>$/Item</th>
                <th class='values'>Total</th>
                <th class="delete"><a href="#" class="like-a-button" id='delete_all_top'>Delete All</a></th>
            </tr>
        </thead>
        <tbody id="abundaCalcBody_request" >
        </tbody>        
        <tfoot>
            <tr>
                <th class="item_count_label" colspan="2">Item Count</th>
                <th class="item_count" id="item_count">0</th>
                <th class="offer_label" colspan="2">Offer<sup>*</sup></th>
                <th class="offer" id="grand_total">$0.00</th>
                <th class="action"><div class="centerme"><a href="#" class="like-a-button" id='delete_all_bottom'>Delete All </a></div></th>
            </tr>
        </tfoot>        
    </table>
    <div id="abunda_notice">
        <p class="subtext"><sup>*</sup> Offer may be adjusted after receipt and review.</p>
    </div>
</div>    
