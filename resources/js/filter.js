// filters.js
import moment from 'moment';

export function formatDate(value) {
    if (value) {
        return moment(String(value)).format('MMMM D-Y, h:mm:ss a');
    }
}
