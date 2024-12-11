function App() {
  const redirectToLogin = () => {
    window.location.href = "http://127.0.0.1:8000/login";
  };

  return (
    <>
      <button onClick={redirectToLogin}>Login</button>;
    </>
  );
}

export default App;
