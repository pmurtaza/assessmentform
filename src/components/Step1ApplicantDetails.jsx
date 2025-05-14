import React from 'react';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { applicantSchema } from '../validationSchemas';

export default function Step1ApplicantDetails({ initialValues, onNext }) {
  return (
    <Formik
      initialValues={{
        name: '',
        its: '',
        age: '',
        mauzeJamiat: '',
        contactNumber: '',
        email: '',
        fullResidentialAddress: '',
        presentOccupationAndWorkAddress: '',
        otherRelevantInfo: '',
        ...initialValues,
      }}
      validationSchema={applicantSchema}
      onSubmit={onNext}
    >
      {({ errors, touched }) => (
        <Form className="container mt-5 p-4 shadow-lg rounded bg-light">
          <h2 className="text-center mb-4">Applicant's Details</h2>

          {/* Full Name */}
          <div className="mb-3">
            <label htmlFor="name" className="form-label">Name</label>
            {errors.name && touched.name && (
              <div className="text-danger mb-2">{errors.name}</div>
            )}
            <Field
              name="name"
              className={`form-control ${errors.name && touched.name ? 'is-invalid' : ''}`}
            />
          </div>

          {/* ITS */}
          <div className="mb-3">
            <label htmlFor="its" className="form-label">ITS</label>
            {errors.its && touched.its && (
              <div className="text-danger mb-2">{errors.its}</div>
            )}
            <Field
              name="its"
              className={`form-control ${errors.its && touched.its ? 'is-invalid' : ''}`}
            />
          </div>

          {/* Age */}
          <div className="mb-3">
            <label htmlFor="age" className="form-label">Age</label>
            {errors.age && touched.age && (
              <div className="text-danger mb-2">{errors.age}</div>
            )}
            <Field
              name="age"
              type="number"
              className={`form-control ${errors.age && touched.age ? 'is-invalid' : ''}`}
            />
          </div>

          {/* Mauze & Jamiat */}
          <div className="mb-3">
            <label htmlFor="mauzeJamiat" className="form-label">Mauze & Jamiat</label>
            {errors.mauzeJamiat && touched.mauzeJamiat && (
              <div className="text-danger mb-2">{errors.mauzeJamiat}</div>
            )}
            <Field
              name="mauzeJamiat"
              className={`form-control ${errors.mauzeJamiat && touched.mauzeJamiat ? 'is-invalid' : ''}`}
            />
          </div>

          {/* Contact Number */}
          <div className="mb-3">
            <label htmlFor="contactNumber" className="form-label">Contact Number</label>
            {errors.contactNumber && touched.contactNumber && (
              <div className="text-danger mb-2">{errors.contactNumber}</div>
            )}
            <Field
              name="contactNumber"
              className={`form-control ${errors.contactNumber && touched.contactNumber ? 'is-invalid' : ''}`}
            />
          </div>

          {/* Email ID */}
          <div className="mb-3">
            <label htmlFor="email" className="form-label">Email ID</label>
            {errors.email && touched.email && (
              <div className="text-danger mb-2">{errors.email}</div>
            )}
            <Field
              name="email"
              type="email"
              className={`form-control ${errors.email && touched.email ? 'is-invalid' : ''}`}
            />
          </div>

          {/* Full Residential Address */}
          <div className="mb-3">
            <label htmlFor="fullResidentialAddress" className="form-label">Full Residential Address</label>
            {errors.fullResidentialAddress && touched.fullResidentialAddress && (
              <div className="text-danger mb-2">{errors.fullResidentialAddress}</div>
            )}
            <Field
              name="fullResidentialAddress"
              as="textarea"
              className={`form-control ${errors.fullResidentialAddress && touched.fullResidentialAddress ? 'is-invalid' : ''}`}
              rows="3"
            />
          </div>

          {/* Present Occupation and Address of Place of Work */}
          <div className="mb-3">
            <label htmlFor="presentOccupationAndWorkAddress" className="form-label">Present Occupation and Address of Place of Work</label>
            {errors.presentOccupationAndWorkAddress && touched.presentOccupationAndWorkAddress && (
              <div className="text-danger mb-2">{errors.presentOccupationAndWorkAddress}</div>
            )}
            <Field
              name="presentOccupationAndWorkAddress"
              as="textarea"
              className={`form-control ${errors.presentOccupationAndWorkAddress && touched.presentOccupationAndWorkAddress ? 'is-invalid' : ''}`}
              rows="3"
            />
          </div>

          {/* Other Relevant Information */}
          <div className="mb-3">
            <label htmlFor="otherRelevantInfo" className="form-label">Other Relevant Information if Any</label>
            {errors.otherRelevantInfo && touched.otherRelevantInfo && (
              <div className="text-danger mb-2">{errors.otherRelevantInfo}</div>
            )}
            <Field
              name="otherRelevantInfo"
              as="textarea"
              className={`form-control ${errors.otherRelevantInfo && touched.otherRelevantInfo ? 'is-invalid' : ''}`}
              rows="3"
            />
          </div>

          <div className="d-flex justify-content-end mt-4">
            <button type="submit" className="btn btn-primary">
              Next
            </button>
          </div>
        </Form>
      )}
    </Formik>
  );
}
