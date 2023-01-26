import {
  GET_REMINDERS,
  ADD_REMINDER,
  UPDATE_REMINDER,
  DELETE_REMINDER
} from '../actionTypes';

const DEFAULT_STATE = [];

export default (state = DEFAULT_STATE, action) => {
  switch (action.type) {
    case ADD_REMINDER:
      // search store for existing date object
      const dateCollection = state.filter(r => r.date === action.activeDate);

      // create new date object if doesn't exist
      if (!dateCollection.length) {
        return [
          ...state,
          { date: action.activeDate, items: [action.reminder] }
        ];
      } else {
        // otherwise, push to existing date object's items array
        return state.map(obj => {
          if (obj.date === action.activeDate) obj.items.push(action.reminder);
          return obj;
        });
      }
    case UPDATE_REMINDER:
      return state.map(obj => {
        if (obj.date === action.activeDate) {
          const newItems = obj.items.map(
            item => (item.id === action.item.id ? action.item : item)
          );
          return { ...obj, items: newItems };
        }
        return obj;
      });
    case DELETE_REMINDER:
      return state.map(obj => {
        const newItems = obj.items.filter(item => item.id !== action.id);
        return { ...obj, items: newItems };
      });
    case GET_REMINDERS:
    default:
      return state;
  }
};
