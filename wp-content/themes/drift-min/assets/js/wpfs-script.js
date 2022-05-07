/* global twentyseventeenScreenReaderText */
(function( $ ) {

    /**
     * Wrap desciption text in span tag so we can style as designed
     */
    const form = $( '.wpfs-form' );

    if( ! form ) {
        return;
    }

    const formType = form.data( 'wpfs-form-type' );
    const fieldNodes = $( '.wpfs-form-check-group .wpfs-form-check' );
    const rsvpLabel = 'Will you join us at David Zwirner on June 23 to help us celebrate our second birthday? (Type "Yes" or "No.")';
    const guestLabel = 'How many guests will you bring?';

    if( fieldNodes ) {
        const forms = [
            'basic',
            'friend',
            'supporter',
            'sponsor',
            'patron'
        ];

        if( 'inline_subscription' === formType ) {
            formatSubscriptions();
            modifyFieldLabels();
        }

        if( 'inline_payment' === formType ) {
            formatPayments();
            moveCustomAmountField();
        }
    }

    function formatSubscriptions() {
        fieldNodes.each( function( index, value ) {
            let $input = $( this ).find( 'input' );
            let $label = $( this ).find( '.wpfs-form-check-label' );
            let $amount =  $input.data( 'wpfs-plan-amount' );
            let $currency = $input.data( 'wpfs-currency' );
            let $planName = $input.data( 'wpfs-plan-name' );

            let amount = new Intl.NumberFormat( 'en-US', { 
                style: 'currency', 
                currency: $currency,
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            } ).format( $amount );

            let $description = '<span class="constrained">' + $planName + '</span>';
            let $price = '<strong>' + amount + '</strong>';
            $label.html( $description + $price );
        } );
    }

    function formatPayments() {
        fieldNodes.each( function( index, value ) {
            let $input = $( this ).find( 'input' );
            let $label = $( this ).find( '.wpfs-form-check-label' );
            let $currency = $input.data( 'wpfs-currency' );
            let $amount = $input.val();
            let $planName =  $input.data( 'wpfs-product-name' );

            let amount = new Intl.NumberFormat( 'en-US', { 
                style: 'currency', 
                currency: $currency,
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            } ).format( $amount );

            let $description = '<span class="constrained">' + $planName + '</span>';
            let $price = '<strong>' + amount + '</strong>';

            $label.html( $description + $price );
        } );
    }

    function moveCustomAmountField() {
        const parent = document.querySelector(`.wpfs-form-check-group`);
        const field = document.querySelector(`[data-wpfs-amount-row='custom-amount']`);

        if( parent && field ) {
            parent.insertAdjacentHTML( 'beforeend', field.outerHTML );
            field.remove();
        }
    }

    function modifyFieldLabels() {
        const rsvpInput = $( form ).find( `[data-wpfs-custom-input-label="rsvp"]` );
        const guestInput = $( form ).find( `[data-wpfs-custom-input-label~="guests"]` );
        const rsvp = ( wpFSData ) ? wpFSData.rsvpLabel : rsvpLabel;
        const guest = ( wpFSData ) ? wpFSData.guestLabel : guestLabel;
        if( rsvpInput ) {
            let rsvpLabel = rsvpInput.prev( 'label' ).text( rsvp );
        }

        if( guestInput ) {
            let guestLabel = guestInput.prev( 'label' ).text( guest );
        }
    }

})( jQuery );
