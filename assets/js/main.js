$(document).ready(function () {
    "use strict";

    let userTable = {

        detailRowClass: '#user-table user-details',
        rowSelector: '#user-table tr.user-row',
        rowspanSelector: 'td:first-child',
        multiRowspanSelector: 'td:nth-last-child(-n+3)',

        init: function () {
            console.log('Ініціалізація userTable...');
            this.initRowClickHandler();
        },

        initRowClickHandler: function () {
            let $this = this;

            $(document).on('click', this.rowSelector, function (e) {
                if ($(e.target).closest('a, button').length) {
                    return;
                }

                let $row = $(this);
                let userId = $row.data('id');

                if ($row.next().hasClass($this.detailRowClass)) {
                    $row.next().fadeOut(200, function () {
                        $(this).remove();
                        $row.find($this.rowspanSelector).removeAttr('rowspan');
                        $row.find($this.multiRowspanSelector).removeAttr('rowspan');
                    });
                    return;
                }

                $.ajax({
                    url: '/crud/getUserAjax',
                    method: 'POST',
                    data: { id: userId },
                    dataType: 'json',
                    success: function (user) {
                        let detailRow = `
                            <tr class="${$this.detailRowClass}">
                                <td>${user.email}</td>
                                <td><strong>Phone:</strong> ${user.phone}</td>
                                <td><strong>Language:</strong> ${user.language}</td>
                                <td><strong>Qualification:</strong> ${user.qualification}</td>
                            </tr>
                        `;
                        console.log(user);
                        $row.find($this.rowspanSelector).attr('rowspan', 2);
                        $row.find($this.multiRowspanSelector).attr('rowspan', 2);

                        let $detailRow = $(detailRow).hide();
                        $row.after($detailRow);
                        $detailRow.fadeIn(200);
                    },
                    error: function () {
                        console.log('Error loading user details');
                    }
                });
            });
        }
    };

    userTable.init();
});
