async function checkAvaProfile(id) {
  let result =  await (await fetch('http://localhost/ShoeManager/profile/check/',+id)).json()
  if (!result.payload) {
     return confirm('The user does not currently have a profile, do you want to create profile?');
  }
}