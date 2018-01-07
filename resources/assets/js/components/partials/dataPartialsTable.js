export default [
  {
    name: '__checkbox',
    titleClass: 'center aligned',
    dataClass: 'center aligned'
  },
  'name', 'email',
  {
    name: 'address.line1',
    title: 'Address 1'
  },
  {
    name: 'address.line2',
    title: 'Address 2'
  },
  {
    name: 'gender',
    title: 'Gender',
    callback: 'genderLabel'
  },
  {
    name: '__component:custom-actions',
    title: 'Actions',
    titleClass: 'center aligned',
    dataClass: 'center aligned'
  }
];
