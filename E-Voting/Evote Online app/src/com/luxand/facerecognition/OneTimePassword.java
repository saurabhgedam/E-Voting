package com.luxand.facerecognition;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.luxand.facerecognition.R;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

/**
 * 
 */
public class OneTimePassword extends Activity {

    private TextView confirm;
    private EditText otp;
    private Button ok;
    private String otpass, election_id, user_id, election_name, candidate_name;
    
    @Override
    public void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.one_time_password);
        confirm = (TextView)findViewById(R.id.confirm);
        otp = (EditText)findViewById(R.id.otp);
        ok = (Button)findViewById(R.id.ok);
        ok.setVisibility(View.GONE);
        otp.setVisibility(View.GONE);
        election_id  = getIntent().getStringExtra("election_id");
        user_id  = getIntent().getStringExtra("user_id");
        candidate_name  = getIntent().getStringExtra("candidate_name");
                
        new Get_onetime_password().execute(user_id, election_id);
        
        ok.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				otpass = otp.getText().toString();
				if(otpass.length()!=0){
				new check_password().execute(user_id, election_id, otpass);
				}else{
					otp.setError("Please enter OTP");
				}
								
			}
		});
         
        
    }

    @Override
    public void onBackPressed()
    {
        Intent intent2 = new Intent(getApplicationContext(), Election_List.class);
        intent2.putExtra("user_id", user_id);
        startActivity(intent2);
        finish();
    }
    public class Get_onetime_password extends AsyncTask<String,String,String> {

        String function = "Get_onetime_pass";
        InputStream is=null;
        String str;

        protected void onPreExecute()
        {
        	confirm.setText("Password is being sent to your registered Mobile number!");
        	//Toast.makeText(getApplicationContext(), "Password is being sent to your registered Mobile number!", Toast.LENGTH_SHORT).show();

        }

        protected String doInBackground(String ... param)
        {
            HttpClient httpClient =new DefaultHttpClient();
            HttpPost httppost = new HttpPost(Constants.URL+function);

            try
            {
                List<NameValuePair> namevaluepair = new ArrayList<NameValuePair>();

                namevaluepair.add(new BasicNameValuePair("user_id", param[0]));
                namevaluepair.add(new BasicNameValuePair("election_id",param[1]));
                httppost.setEntity(new UrlEncodedFormEntity(namevaluepair));

                HttpResponse response =httpClient.execute(httppost);
                HttpEntity entity = response.getEntity();
                //	String str = EntityUtils.toString(entity);

                // read content
                is = entity.getContent();

            } catch (Exception e) {

                Log.e("log_tag", "Error in http connection " + e.toString());
            }
            try {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(is));
                StringBuilder sb = new StringBuilder();
                String line = "";
                while ((line = br.readLine()) != null) {
                    sb.append(line + "\n");
                }
                is.close();
                str = sb.toString();
                System.out.println("Result do in background"+str);


            }
            catch (Exception e) {

                Log.e("log_tag", "Error converting result " + e.toString());
            }
            return str;
        }

        @Override
        protected void onPostExecute(String result) {
            try {

                JSONObject object = new JSONObject(result);
                String success = object.getString("success");
                if(success.equals("true")){
                	confirm.setText("Please enter OTP");
                	ok.setVisibility(View.VISIBLE);
                	otp.setVisibility(View.VISIBLE);
                	                	
                    }
                else if(success.equals("false")){
                	confirm.setText("You have already voted for this Election");
                	
                }


            } catch (JSONException e) {

                e.printStackTrace();
            }

        }
    }

    public class check_password extends AsyncTask<String,String,String> {

        String function = "validate_credential";
        InputStream is=null;
        String str;

        protected void onPreExecute()
        {
        	confirm.setText("Please wait.....");
        	ok.setVisibility(View.GONE);
        	otp.setVisibility(View.GONE);

        }

        protected String doInBackground(String ... param)
        {
            HttpClient httpClient =new DefaultHttpClient();
            HttpPost httppost = new HttpPost(Constants.URL+function);

            try
            {
                List<NameValuePair> namevaluepair = new ArrayList<NameValuePair>();

                namevaluepair.add(new BasicNameValuePair("user_id", param[0]));
                namevaluepair.add(new BasicNameValuePair("election_id",param[1]));
                namevaluepair.add(new BasicNameValuePair("password",param[2]));
                httppost.setEntity(new UrlEncodedFormEntity(namevaluepair));

                HttpResponse response =httpClient.execute(httppost);
                HttpEntity entity = response.getEntity();
                //	String str = EntityUtils.toString(entity);

                // read content
                is = entity.getContent();

            } catch (Exception e) {

                Log.e("log_tag", "Error in http connection " + e.toString());
            }
            try {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(is));
                StringBuilder sb = new StringBuilder();
                String line = "";
                while ((line = br.readLine()) != null) {
                    sb.append(line + "\n");
                }
                is.close();
                str = sb.toString();
                System.out.println("Result do in background"+str);


            }
            catch (Exception e) {

                Log.e("log_tag", "Error converting result " + e.toString());
            }
            return str;
        }

        @Override
        protected void onPostExecute(String result) {
            try {

                JSONObject object = new JSONObject(result);
                String success = object.getString("success");
                if(success.equals("true")){
                	Intent intent2 = new Intent(getApplicationContext(), VoteConfirm.class);
    		        intent2.putExtra("user_id", user_id);
    		        intent2.putExtra("election_id", election_id);
    		        intent2.putExtra("candidate_name", candidate_name);
    		        startActivity(intent2);
    		        finish();
                	
                    }
                else if(success.equals("false")){
                	Toast.makeText(getApplicationContext(), "OTP does not match. Please enter valid OTP!", Toast.LENGTH_LONG).show();
                	otp.setText("");
                }


            } catch (JSONException e) {

                e.printStackTrace();
            }

        }
    }
}
