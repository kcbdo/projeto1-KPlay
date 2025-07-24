test('nome do teste', callbackFunction)
function callbackFunction() {}
test('espero que 1 seja 1', () => {
  expect(1).toBe(1)
})
test('espero que 2 vezes 2 seja 4', () => {
  expect(2 * 2).toBe(4)
})
