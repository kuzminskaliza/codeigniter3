$(document).ready(function () {
    "use strict";

    const USER_STATUS_ACTIVE = 1;
    const USER_STATUS_INACTIVE = 0;
    let userTable = {

        detailRowClass: '#user-table user-details',
        rowSelector: '#user-table tr.user-row',
        rowspanSelector: 'td:first-child',
        multiRowspanSelector: 'td:nth-last-child(-n+3)',
        updateStatusSelector: '.update-status .badge',

        init: function () {
            console.log('Ініціалізація userTable...');
            this.initRowClickHandler();
            this.initUpdateStatus();
        },


        initRowClickHandler: function () {
            let $this = this;

            $(document).on('click', this.rowSelector, function (e) {
                if ($(e.target).closest('a, button, span').length) {
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
                    data: {id: userId},
                    dataType: 'json',
                    success: function (user) {
                        let detailRow = `
                            <tr class="${$this.detailRowClass}">
                                <td>${user.email}</td>
                                <td><strong>Phone:</strong> ${user.phone}</td>
                                <td><strong>Language:</strong> ${user.language}</td>
                                <td><strong>Qualification:</strong> ${user.qualification}</td>
                                <td><strong>Update:</strong> ${user.updated_on}</td>
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
                        alert('Error loading user details');
                        console.log('Error loading user details');
                    }
                });
            });
        },
        initUpdateStatus: function () {
            let $this = this;

            $(document).on('click', $this.updateStatusSelector, function () {

                let $badge = $(this);
                let $row = $badge.closest($this.rowSelector);
                let userId = $row.data('id');

                let active = $badge.hasClass('bg-success');
                let actionText = active ? 'Deactivate' : 'Activate';

                if (!confirm(`Are you sure you want to ${actionText} user with id ${userId}?`)) {
                    return;
                }

                $.ajax({
                    url: '/crud/toggleStatus',
                    method: 'POST',
                    data: {id: userId},
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            let newStatus = response.status;

                            if (newStatus === USER_STATUS_ACTIVE) {
                                $badge.removeClass('bg-danger').addClass('bg-success').text('Active');
                            } else if (newStatus === USER_STATUS_INACTIVE) {
                                $badge.removeClass('bg-success').addClass('bg-danger').text('Deactive');
                            }
                            console.log('status changed', newStatus);
                        } else {
                            alert('Error changing user status');
                        }
                    },
                    error: function () {
                        alert('Error loading user details');
                    }
                });
            });
        }
    };

    userTable.init();
});
